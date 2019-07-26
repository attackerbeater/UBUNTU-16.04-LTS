import React, {Component} from 'react';

import articleContent from './article-content';
import ArticlesList from '../components/ArticlesList';

export default class ArticlesListPage extends Component {
  render() {
    return (
        <>
          <h1>Articles</h1>
          <ArticlesList articles={articleContent} />
        </>
      );
   }
}
