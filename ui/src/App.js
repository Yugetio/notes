import React, { Component } from 'react';
import { HashRouter as Router, Route } from 'react-router-dom';
import Register from './components/RegisterContainer/Register';
import Login from './components/LoginContainer/Login';
import Header from './components/HeaderContainer/Header';
import Description from './components/Description/Description';
import Footer from './components/FooterContainer/Footer';
import Folder from "./components/FoldersContainer/Folder";
import SameNote from "./components/SameNoteContainer/SameNote";
import Profile from "./components/ProfileContainer/Profile";

import './App.css';

class App extends Component {

    constructor(props) {
        super(props);
        this.state = {
            searchRequest: '',
        };

        this.checkIfUserLogin = this.checkIfUserLogin.bind(this);
    }

    receiveSearchRequest = (searchReq) => { // email - дані, що приходять від BaseInput
        this.setState(
            {
                searchRequest: searchReq
            }
        );
    };

    checkIfUserLogin(replace){
        if (window.localStorage.getItem('Authorization') !== "") {
            return 0;
        }
        else replace('/');
    };

    render() {
        return (
            <Router>
                <div className="app">
                    <div className="main-container">
                        <Header requestSearch={this.receiveSearchRequest} />
                        <Route exact path="/" component={Login} />
                        <Route path="/register" component={Register} />
                        <Route path="/folder" render={(props) => <Folder searchRequest={this.state.searchRequest} {...props}/>} />
                        <Route path="/note/id" component={SameNote} />
                        <Route path="/user" component={Profile} onEnter={this.checkIfUserLogin} />

                    </div>

                    <Route exact path="/" component={Description}>
                    </Route>
                    <Route exact path="/register" component={Description}>
                    </Route>

                    <Footer/>

                </div>
            </Router>
        );
    }
}

export default App;
