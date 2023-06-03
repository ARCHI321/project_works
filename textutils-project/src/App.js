// import logo from './logo.svg';
import "./App.css";
import Navbar from "./components/Navbar";
import TextFrom from "./components/TextFrom";
import Alert from "./components/Alert";
import About from "./components/About";
import React, { useState } from "react";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";

//let name = "Harry";
//let name1 = "<b>Harry</b>"
function App() {
  const [mode, setMode] = useState("light");
  const [modeText, setModeText] = useState("text-dark");
  const [enable, setEnable] = useState("Enable");
  const [alert, setAlert] = useState(null);

  const toggleMode = () => {
    if (mode === "light") {
      setMode("dark");
      setModeText("text-light");
      setEnable("Disable");
      document.body.style.backgroundColor = "grey";
      showAlert("Dark Mode has been Enabled", "success");
      document.title = "TextUtils - DarkMode";
      // setInterval(() => {
      //   document.title = "TextUtils is Amazing!!";
      // }, 2000);
      // setInterval(() => {
      //   document.title = "Install TextUtils Now.";
      // }, 1500);
    } else {
      setMode("light");
      setModeText("text-dark");
      setEnable("Enable");
      document.body.style.backgroundColor = "white";
      showAlert("Light Mode has been Enabled", "success");
      document.title = "TextUtils - LightMode";
    }
  };

  const showAlert = (message, type) => {
    setAlert({
      msg: message,
      type: type,
    });

    setTimeout(() => {
      setAlert(null);
    }, 1500);
  };

  return (
    // <>
    // <h1>Hello</h1>
    // <div className="App">
    //   <header className="App-header">
    //     <img src={logo} className="App-logo" alt="logo" />
    //     <p>
    //       Edit <code>src/App.js</code> and save to reload.
    //     </p>
    //     <a
    //       className="App-link"
    //       href="https://reactjs.org"
    //       target="_blank"
    //       rel="noopener noreferrer"
    //     >
    //       Learn React with Archi
    //     </a>
    //   </header>
    // </div>
    // </>

    // <>
    //  <nav>
    //    <li>Home</li>
    //    <li>About</li>
    //    <li>Contact</li>
    //    <li>Services</li>
    //  </nav>
    //  <div className="container">
    //    <h1>Hello {name1}</h1>
    //    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est qui necessitatibus commodi sint consectetur, nobis doloremque. Molestias, atque facilis dolore debitis id non laborum perspiciatis earum obcaecati ipsam ad cum.</p>
    //  </div>
    // </>

    <>
      {/* <Navbar /> */}
      <Router>
      <Navbar
        title="TextUtils"
        aboutText="AboutUs"
        mode={mode}
        toggleMode={toggleMode}
        modeText={modeText}
        enable={enable}
      />
      <Alert alert={alert} />
      <div className="container my-3">
        <Switch>
          <Route exact path="/about">
            <About />
          </Route>
          <Route exact path="/">
            <TextFrom
              showAlert={showAlert}
              heading="Enter your text"
              modeText={modeText}
            />
          </Route>
        </Switch>
      </div>
      </Router>
    </>
  );
}

export default App;
