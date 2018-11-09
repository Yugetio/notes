import React, { Component } from 'react';
import './cteateNoteWindow.css';


class CreateNoteWindow extends Component {

    constructor(props) {
        super(props);
        this.state = {
            CreateFolderOrNote: 0,
        };
    };

    closeNoteWindow = () => {
        this.props.handleClick(this.state.CreateFolderOrNote)
    };

    render() {

        let isNoteWindow;
        if (this.props.CreateNote === 0 || this.props.CreateNote === 1 ) {
            isNoteWindow = null;
        } else {
            isNoteWindow =
                <div className="create">
                    <div className="name">
                        <p>Create Note</p>
                        <p onClick={this.closeNoteWindow}>&#10008;</p>
                    </div>
                    <div className="inputFieldsNote">
                        <div className="inputTitle">
                            <input className="inputStyle" type="text" placeholder="Enter title"/></div>
                        <div className="inputText">
                            <textarea className="inputStyle" placeholder="Enter your note" ></textarea>
                        </div>
                    </div>



                    <button className="button"><span>Create</span></button>
                </div>
        }

        return isNoteWindow;
    };
}

export default CreateNoteWindow;