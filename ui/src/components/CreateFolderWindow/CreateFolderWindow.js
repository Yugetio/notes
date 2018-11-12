import React, { Component } from 'react';
import '../CreateNoteWindow/cteateNoteWindow.css';


class CreateFolderWindow extends Component {

    constructor(props) {
        super(props);
        this.state = {
            CreateFolderOrNote: 0,
            data: {
                FolderName: '',
            },
            httpMethod: 'POST',
            url: 'api/auth/folder/{id}'
        };
        this.handleChange = this.handleChange.bind(this);
    };

    closeFolderWindow = () => {
        this.props.handleClick(this.state.CreateFolderOrNote)
    };

    receiveNameFolder = (name) => {
        this.setState(
            {
                data:{
                    FolderName: name,
                }
            }
        );
    };

    handleChange(e) {
        this.receiveNameFolder(e.target.value); // данні з input

    };

    createFolderQuery() {
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
                                placeholder="Enter folder name"
                                onChange={this.handleChange}
                            />
                        </div>
                    </div>
                    <button
                        className="button"
                        onClick = {this.createFolderQuery.bind(this)}
                    ><span>Create</span></button>
                </div>
        }

        return isFolderWindow;
    };
}

export default CreateFolderWindow;