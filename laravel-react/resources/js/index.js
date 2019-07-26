import './bootstrap';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Router, Link, Route, Switch } from 'react-router-dom';
import Nav from './components/Nav';
import Blog from './components/Blog';
import Example from './components/Example';

export default class Index extends Component {
    render() {
        return (
          <BrowserRouter>
            <div className="container">
              <Nav/>
              <Switch>
                <Route path="/" exact strict component={Example}/>
                <Route path="/blog" exact strict component={Blog}/>
              </Switch>
            </div>
          </BrowserRouter>
        );
    }
}

if (document.getElementById('index')) {
    ReactDOM.render(<Index />, document.getElementById('index'));
}
