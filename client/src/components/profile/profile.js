import React, { Component } from 'react';
import '../css/profile.css';

export class profile extends Component {

  state = {
    users: []
  }
  componentDidMount() {
    this.getUrl();
    this.getUsers();
  }


  getUrl = _ => {
    const { handle } = this.props.match.params
    console.log(this.props.match.params);
    fetch('/api/geturl', {
      method: 'POST',
      body: JSON.stringify({ url: handle }),
      headers: { 'Content-Type': 'application/json' }
    })
      .then(res => res.text())
  }

  getUsers = _ => {
    fetch('/api/profile')
      .then(response => response.json())
      .then(response => this.setState({ users: response.data }))
      .catch(err => console.error(err));
  }

  render() {
    // console.log('Jesper Larsen'.split(' ')[0], 'Jesper Larsen'.split(' ')[1].split('')[0]);
    return (
      <div>
        {this.state.users.map(user =>
          <section className="profile" key={user.id}>
            <section className="profile__info">
              <figure className="profile__fig">
                <img className="profile__img" src="https://images.pexels.com/photos/20787/pexels-photo.jpg?auto=compress&cs=tinysrgb&h=350" alt="profile avatar" />
              </figure>
              <article className="profile__text">
                <h1 className="profile__text-name">{user.username.split(' ')[0] + ' ' + user.username.split(' ')[1].split('')[0]}</h1>
                <p className="profile__text-last--online">Sidst aktiv: 25-09-2019</p>
                <p className="profile__text-city"><span className="profile__text-postnr">{user.postnumber}</span> {user.city}</p>
                <p className="profile__text-tel"><span className="profile__text-telnr">Tel: </span>{user.phone}</p>
                <i className="fas fa-star profile__text-star">+ star</i>
                <button type="button" className="profile__text-send-msg">Send besked</button>
              </article>
            </section>
            <section className="profile__articles">
              <h2 className="profile__articles-header">Annocner</h2>
              <section className="profile-articles-article-container">
                <p className="profile__articles-article-show">Vis flere</p>
                <p className="profile__articles-article-no-show"></p>
              </section>
            </section>
          </section>
        )}
      </div>
    );
  }
}

export default profile





