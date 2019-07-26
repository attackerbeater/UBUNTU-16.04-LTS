<template>
  <div>
    <h2>Articles</h2>
    <form @submit.prevent="addArticle" class="mb-3">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Title" v-model="article.title">
      </div>
      <div class="form-group">
        <textarea class="form-control" placeholder="Body" v-model="article.body"></textarea>
      </div>
      <button type="submit" class="btn btn-light btn-block">Save</button>
    </form>

  </div>
</template>

<script>
export default {
  data() {
    return {
      article: {
        id: '',
        title: '',
        body: ''
      },
      edit: false
    }
  },
  methods: {
    addArticle() {
      if (this.edit === false) {
        fetch('api/article', {
          method: 'post',
          body: JSON.stringify(this.article),
          headers: {
            'content-type' : 'application/json'
          }
        })
        .then(res => res.json())
        .then(data =>{
          alert('post success!');
        })
        .catch(err => console.log(err));

      } else {
        alert('edit');
      }
    }
  }
}
</script>
