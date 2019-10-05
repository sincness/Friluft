import React from 'react';
import './App.css';
import Profile from './components/profile/profile';
import Home from './components/customers';
import CreateArticle from './components/CreateArticle';
import { Switch, Route } from "react-router-dom";

function App() {
  return (
    <React.Fragment>
      <Switch>
        <Route exact path="/" component={Home} />
        <Route path="/profile/:handle" component={Profile} />
        <Route path="/areate_article" component={CreateArticle} />
      </Switch>
    </React.Fragment>
  );
}

export default App;