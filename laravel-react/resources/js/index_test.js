import React, {Component} from 'react';
import ReactDom from 'react-dom';
import Header from './components/Header';
import MainContent from './components/MainContent';
import Footer from './components/Footer';

export default class Index extends Component {
  render() {
      return(
        <div className="container">
          <Header />
          <MainContent />
          <Footer />
        </div>
      );
  }
}

if(document.getElementById('index')){
    ReactDom.render(<Index />, document.getElementById('index'));
}
