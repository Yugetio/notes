import React, { Component } from 'react';
import './createFolderWindow.css';


class CreateFolderWindow extends Component {

    constructor(props) {
        super(props);
        this.state = {
            CreateFolder: 0,
        };
    };

    closeFolderWindow = () => {
        this.props.handleClick(this.state.CreateFolder)
    };

    render() {

        let isFolderWindow;
        if (this.props.CreateFolder === 0) {
            isFolderWindow = null;
        } else {
            isFolderWindow =
                <div className="createFolderWindow">
                    <div className="nameFolder">
                        <p>Name Folder</p>
                        <p onClick={this.closeFolderWindow}>&#10008;</p>
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