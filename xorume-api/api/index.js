import express from "express";
import cors from "cors";
import bodyParser from "body-parser";
import multer from "multer";

import { storage } from "./api/firebase.jss";
import { ref, listAll, getDownloadURL, uploadBytes } from "firebase/storage";

const app = express();
const port = 3000;

app.use(cors());

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

const upload = multer({ storage: multer.memoryStorage() });

app.get("/episodes", (_, res) => {
  const storageRef = ref(storage, "/episodes");

  let htmlContent = `
    <ul 
      style="list-style:none;margin:0;padding:0;" 
      class="d-flex justify-content-center align-items-center flex-wrap"
    >
  `;

  listAll(storageRef)
    .then((result) => {
      htmlContent += result.items
        .map((item) => {
          return `
            <li>
              <div class="card m-2 container-fluid" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">${item.name}</h5>
                  <button 
                    hx-get="/episode?name=${item.name}&path=${item.fullPath}" 
                    hx-target="#container"
                    class="btn btn-success"
                  >
                    Escutar
                  </button>
                </div>
              </div>
            </li>`;
        })
        .join("");
      htmlContent += "</ul>";
      res.send(htmlContent);
    })
    .catch((error) => {
      console.log(error);
    });
});

app.get("/episode", (req, res) => {
  const { path } = req.query;
  const storageRef = ref(storage, path);
  getDownloadURL(storageRef)
    .then((url) => {
      res.send(`
      <audio class="m-3" controls>
        <source src="${url}" type="audio/mpeg">
        Your browser does not support the audio element.
      </audio>
      `);
    })
    .catch((error) => {
      res.send(`
      <div class="alert alert-danger" role="alert">
        ${error.message}
      </div>
      `);
    });
});

app.post("/episode", upload.single("file"), async (req, res) => {
  const { name, password } = req.body;
  if (password !== "xorumelios") {
    res.send(`
      <div class="alert alert-danger" role="alert">
        Invalid password
      </div>
    `);
    return;
  }
  const storageRef = ref(storage, `/episodes/${name}`);
  const metadata = {
    contentType: "audio/mpeg",
  };
  await uploadBytes(storageRef, req.file.buffer, metadata)
    .then(() => {
      res.send(`
      <div class="alert alert-success" role="alert">
        ${name} uploaded successfully!
      </div>
    `);
    })
    .catch((error) => {
      res.send(`
      <div class="alert alert-danger" role="alert">
        ${error.message}
      </div>
    `);
    });
});

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});

module.exports = app;
