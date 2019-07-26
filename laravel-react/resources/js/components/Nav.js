import React, {Component} from 'react';
import { Link } from 'react-router-dom';

export default class Nav extends Component {
  render() {
      return(
        <nav>
          <ul>
            <li><Link to="/">Home</Link></li>
            <li><Link to="/blog">Blog</Link></li>
          </ul>
        </nav>
      );
    }
}
