import React, { Component } from 'react';
import '../CreateNoteWindow/cteateNoteWindow.css';


class CreateFolderWindow extends Component {

    constructor(props) {
        super(props);
        this.state = {
            CreateFolderOrNote: 0,
        };
    };

    closeFolderWindow = () => {
        this.props.handleClick(this.state.CreateFolderOrNote)
    };

    render() {

        let isFolderWindow;
        if (this.props.CreateFolder === 0 || this.props.CreateFolder === 2) {
            isFolderWindow = null;
        } else {
            isFolderWindow =
                <div className="create">
                    <div className="name">
                        <p>Create Folder</p>
                        <p onClick={this.closeFolderWindow}>&#10008;</p>
                    </div>
                    <div className="inputFieldsFolder">
                        <div className="inputTitleFolder" >
                            <input
                                className="inputStyle"
                                type="text"
                                placeholder="Enter folder name"/></div>
                    </div>
                    <button className="button"><span>Create</span></button>
                </div>
        }

        return isFolderWindow;
    };
}

export default CreateFolderWindow;