import React, { useState } from "react";
// import PropTypes from 'prop-types'

export default function TextFrom(props) {
  const handleUpClick = () => {
    // console.log("Uppercase was clicked" +text);
    let newtext = text.toUpperCase();
    setText(newtext);
    props.showAlert("Converted to Upper Case!","success");
  };

  const handleDownClick = () => {
    // console.log("Uppercase was clicked" +text);
    let newtext = text.toLowerCase();
    setText(newtext);
    props.showAlert("Converted to Lower Case!","success");
  };

  const handleOnChange = (event) => {
    // console.log("Handle on change");
    setText(event.target.value);
  };
  const handleCopy = (event) => {
    let text = document.getElementById("myBox");
    text.select();
    navigator.clipboard.writeText(text.value);
    props.showAlert("Text Copied","success");
  };

  const handleCapitalize = (event) => {
    // console.log("Handle on change");
    let text1 = text.toLowerCase();
    const arr = text1.split(" ");

    //loop through each element of the array and capitalize the first letter.

    for (var i = 0; i < arr.length; i++) {
      arr[i] = arr[i].charAt(0).toUpperCase() + arr[i].slice(1);
    }

    //Join all the elements of the array back into a string
    //using a blankspace as a separator
    const newtext = arr.join(" ");
    setText(newtext);
  };

  const handleClear = (event) => {
    // console.log("Handle on change");
    setText("");
    props.showAlert("Text Cleared!","success");
  };

  const handleExtraSpaces = (event) => {
    let newtext = text.split(/[ ]+/);
    setText(newtext.join(" "))
  };

  // Declare a new state variable, which we'll call "count"
  const [text, setText] = useState("");
  // setText("dfdfdfdfdf"); //correct way to set a text

  return (
    <>
      <div className={`my-3 container ${props.modeText}`}>
        <div className="mb-3">
          <h1>{props.heading} </h1>
          <label for="myBox" className="form-label">
            Example TextArea
          </label>
          <textarea
            className="form-control"
            placeholder="enter text here"
            value={text}
            onChange={handleOnChange}
            id="myBox"
            rows="8"
          ></textarea>
        </div>
        <button className="btn btn-primary" onClick={handleUpClick}>
          Convert to UpperCase
        </button>
        <button className="btn btn-primary mx-2" onClick={handleDownClick}>
          Convert to LowerCase
        </button>
        <button className="btn btn-primary " onClick={handleClear}>
          Clear Text
        </button>
        <button className="btn btn-primary mx-2" onClick={handleCapitalize}>
          Capitalize Text
        </button>
        <button className="btn btn-primary " onClick={handleCopy}>
          Copy Text
        </button>
        <button className="btn btn-primary mx-2" onClick={handleExtraSpaces}>
          Remove Extra Space
        </button>
      </div>

      <div className= {`container my-3 ${props.modeText}`}>
        <h2>Your text summary</h2>
        <p>
          {text.split(" ").length} words , {text.length} characters
        </p>
        <p>{0.008 * text.split(" ").length} Minutes Read</p>
        <h3>Preview</h3>
        <p>{text.length>0?text:"Enter your Something to preview"}</p>
      </div>
    </>
  );
}

// //to set the type of values props should have
// TextFrom.propTypes =  {
//     heading: PropTypes.string.isRequired,
// }

// //to set deafult prop if not passed
// TextFrom.defaultProps = {
//     heading: "Set heading here",

// }
