import React, { Component } from 'react';
import CreateFolderButton from '../CreateFolder/CreateFolderButton';
import CreateNote from '../CreateNote/CreateNote';

import './createBar.css';

class CreateBar extends Component {
    constructor(props) {
        super(props);

        this.state = {

        };

    }


    render() {
        return (
            <div className='addFoldNote' >
                <CreateFolderButton handleClick = {this.props.handleClick}/>
                <CreateNote/>
            </div>
        );
    }
}

export default CreateBar;