import React, { Component } from 'react';
import './createFolder.css';


class CreateFolder extends Component {

    constructor(props) {
        super(props);
        this.state = {
            CreateFolderWindow: false
        };
    };


    render() {
        return (

            <div className="field">

                <p className='createFolder'> </p>
            </div>
        );
    };
}

export default CreateFolder;