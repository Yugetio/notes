import React, { Component } from 'react';
import './createFolderWindow.css';


class CreateFolderWindow extends Component {

    constructor(props) {
        super(props);
        this.state = {

        };
    };

    render() {

        let isFolderWindow;
        if (this.props.CreateFolder === false) {
            isFolderWindow = null;
        } else {
            isFolderWindow =
                <div className="createFolderWindow">
                    <div className="name">
                        <p>Name Folder</p>
                        <p><a href="#">&#10008;</a></p>
                    </div>
                    <div className="inputName">
                        <div className="input" > <input type="text" /></div>
                    </div>
                    <button className="button"><span>Create</span></button>
                </div>
        }

        return isFolderWindow;
    };
}

export default CreateFolderWindow;