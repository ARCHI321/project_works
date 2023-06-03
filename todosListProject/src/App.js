
// import './App.css';
// import Header from "./MyComponents/header";
// import {Todos} from"./MyComponents/Todos";
// import {Footer} from "./MyComponents/Footer";
// import React,{ useState } from 'react';


// function App() {

//   const onDelete = (todo)=>{
//     console.log("I am on delete of todo",todo)

//     // deleting this way in react will not work
//     // let index = todos.indexOf(todo)
//     // todos.splice(index,1)

//     setTodos(todos.filter((e)=>
//     {
//       return e!==todo;
//     }
//     ));
//   }

//   const [todos,setTodos]=useState([
//     {
//       sno: 1,
//       title: "Go to the market",
//       desc: "You need to go to the market to get this job done"
//     },
//     {
//       sno: 2,
//       title: "Go to the mall",
//       desc: "You need to go the mall to get this job done"
//     },
//     {
//       sno: 3,
//       title: "Go to the ghat",
//       desc: "You need to go the ghat to get this job done"
//     }
//   ]);

//   return (
//     /*<div className="App">
//       <header className="App-header">
//         <div>{12+45}</div>  
//         <div>{myVar}</div>  
//         <img src={logo} className="App-logo" alt="logo" />
//         <p>
//           Edit <code>src/App.js</code> and save to reload.
//         </p>
//         <a
//           className="App-link"
//           href="https://reactjs.org"
//           target="_blank"
//           rel="noopener noreferrer"
//         >
//           Learn React
//         </a>
//       </header>
//     </div>*/

//     <>
//        <Header title="My Todos List" searchBar = {true}/>
//        <Todos todos = {todos} onDelete = {onDelete}/>
//        <Footer/>
    
//     </>
//   );
// }

// export default App;


import './App.css';
import Header from "./MyComponents/Header";
import { Todos } from "./MyComponents/Todos";
import { Footer } from "./MyComponents/Footer";
import { AddTodo } from "./MyComponents/AddTodo";
import { About } from "./MyComponents/About";
import React, { useState, useEffect } from 'react';
import {
  BrowserRouter as Router,
  Switch,
  Route
} from "react-router-dom";

function App() {
  let initTodo;
  if (localStorage.getItem("todos") === null) {
    initTodo = [];
  }
  else {
    initTodo = JSON.parse(localStorage.getItem("todos"));
  }


  const onDelete = (todo) => {
    console.log("I am ondelete of todo", todo);
    // Deleting this way in react does not work
    // let index = todos.indexOf(todo);
    // todos.splice(index, 1);

    setTodos(todos.filter((e) => {
      return e !== todo;
    }));
    console.log("deleted", todos)
    localStorage.setItem("todos", JSON.stringify(todos));
  }

  const addTodo = (title, desc) => {  
    console.log("I am adding this todo", title, desc)
    let sno;
    if (todos.length === 0) {
      sno = 0;
    }
    else {
      sno = todos[todos.length - 1].sno + 1;
    }
    const myTodo = {
      sno: sno,
      title: title,
      desc: desc,
    }
    setTodos([...todos, myTodo]);
    console.log(myTodo);
  }

  const [todos, setTodos] = useState(initTodo);
  useEffect(() => {
    localStorage.setItem("todos", JSON.stringify(todos));
  }, [todos])

  return ( 
    <> 
    <Router>
      <Header title="My Todos List" searchBar={true} /> 
      <Switch>
          <Route exact path="/" render={()=>{
            return(
            <>
            <AddTodo addTodo={addTodo} />
            <Todos todos={todos} onDelete={onDelete} /> 
            </>)
          }}> 
          </Route>
          <Route exact path="/about">
            <About />
          </Route> 
        </Switch> 
      <Footer />
    </Router>
    </>
  );
}

export default App;
