import { initializeApp } from "firebase/app";
import { getStorage } from "firebase/storage";

const firebaseConfig = {
  apiKey: "AIzaSyArea_yJOzbTV1PKCpdQKFvAmi03TyPCv4",
  authDomain: "xorume-podcast.firebaseapp.com",
  projectId: "xorume-podcast",
  storageBucket: "xorume-podcast.appspot.com",
  messagingSenderId: "174003765911",
  appId: "1:174003765911:web:5f6ecf873cdc8750865fd2",
  measurementId: "G-Z194QEQTRC",
};

export const app = initializeApp(firebaseConfig);
export const storage = getStorage(app);
