import React, { Component } from 'react';

import './createNote.css';

class CreateNoteButton extends Component {

    constructor(props) {
        super(props);
        this.state = {
            CreateFolderOrNote: 2,
        };
    };

    clickCreateNote = () => {
        this.props.handleClick(this.state.CreateFolderOrNote)
    };

    render() {
        return (
            <div
                className="field"
                 onClick={this.clickCreateNote}
            >
                <p className='createNotes'> </p>
            </div>
        );
    };
}

export default CreateNoteButton;