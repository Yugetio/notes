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

    render() {
        return (
            <div className='addFoldNote' >
                <CreateFolderButton/>
                <CreateNoteButton
                    handleClick = {this.props.handleClick}
                />
            </div>
        );
    }
}

export default CreateBar;