import React, { Component } from 'react';
import CreateFolderButton from '../CreateFolderButton/CreateFolderButton';
import CreateNoteButton from '../CreateNoteButton/CreateNoteButton';

import './createBar.css';
import {SendRequestWithAuthorization} from "../../ManagerRequests";

class CreateBar extends Component {
    constructor(props) {
        super(props);

        this.state = {

        };

    }
    // componentDidMount() {
    //     fetch('api/auth/me', {
    //         method: 'POST', // *GET, POST, PUT, DELETE, etc.
    //         headers: {
    //             "Content-Type": "application/json; charset=utf-8",
    //             "Authorization": localStorage.getItem('Authorization')
    //         }
    //     })
    //         .then( response => {
    //             if (response.status === 200 || response.status === 201) {
    //                 localStorage.setItem('Authorization', response.headers.get('Authorization'));
    //                 return response.json();
    //             }
    //         })
    //         .then((data) => this.setState({
    //             data: {
    //                 user: data.email
    //             }
    //         }))
    //         .catch( error => console.error(error) );
    // }

    createFolder() {

    };

    createNote() {

    };

    render() {
        return (
            <div className='addFoldNote' >
                <CreateFolderButton
                    handleClick = {this.props.handleClick}
                    createFolder = {this.createFolder}
                />
                <CreateNoteButton
                    handleClick = {this.props.handleClick}
                    createNote = {this.createNote}
                />
            </div>
        );
    }
}

export default CreateBar;