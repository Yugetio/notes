import React, { Component } from 'react';
import './createFolderWindow.css';


class CreateFolderWindow extends Component {

    constructor(props) {
        super(props);
        this.state = {

        };
    };

    handleClick() {
        if (this.state.isFolderWindow) {
            this.setState({ isFolderWindow: false });
        } else {
            this.setState({ isFolderWindow: true });
        }
    };

    render() {
        return (
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
        );
    };
}

export default CreateFolderWindow;