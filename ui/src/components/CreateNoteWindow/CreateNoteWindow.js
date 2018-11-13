import React, { Component } from 'react';
import './cteateNoteWindow.css';


class CreateNoteWindow extends Component {

    constructor(props) {
        super(props);
        this.state = {
            CreateFolderOrNote: 0,
            data: {
                caption: '',
                text: '',
                parent_id: 0
            },
            httpMethod: 'POST',
            url: 'api/auth/folder/{id}'
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleChangeNote = this.handleChangeNote.bind(this);
    };

    receiveTitle = (caption) => {
        this.setState(
            {
                data:{
                    caption: caption,
                    text: this.state.data.text
                }
            }
        );
    };

    receiveNote = (text) => {
        this.setState(
            {
                data:{
                    caption: this.state.data.caption,
                    text: text
                }
            }
        );
    };

    handleChange(e) {
        this.receiveTitle(e.target.value); // данні з input

    };

    handleChangeNote(e) {
        this.receiveNote(e.target.value);
    };

    closeNoteWindow = () => {
        this.props.handleClick(this.state.CreateFolderOrNote)
    };

    createNoteQuery() {
        fetch(this.state.url, {
            method: this.state.httpMethod,
            headers: {
                "Content-Type": "application/json; charset=utf-8",
                "Authorization": localStorage.getItem('Authorization')
            },
            body: JSON.stringify(this.state.data),
        })
            .then( response => {
                if (response.status === 200 || response.status === 201) {
                    localStorage.setItem('Authorization', response.headers.get('Authorization'));
                    return response.json();
                }
            })

            .catch( error => console.error(error) );
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
                            <input
                                className="inputStyle"
                                type="text"
                                placeholder="Enter title"
                                onChange={this.handleChange}
                            />
                        </div>
                        <div className="inputText">
                            <textarea
                                className="inputStyle"
                                placeholder="Enter your note"
                                onChange={this.handleChangeNote}
                            >
                            </textarea>
                        </div>
                    </div>

                    <button
                        className="button"
                        onClick = {this.createNoteQuery.bind(this)}><span>Create</span>
                    </button>
                </div>
        }

        return isNoteWindow;
    };
}

export default CreateNoteWindow;