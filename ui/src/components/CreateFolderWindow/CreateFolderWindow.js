import React, { Component } from 'react';
import '../CreateNoteWindow/cteateNoteWindow.css';
import {connect} from 'react-redux';
import {createNameNote, createTextNote} from '../../actions'

class CreateFolderWindow extends Component {

    constructor(props) {
        super(props);
        this.handleChange = this.handleChange.bind(this);
    };


    resiveId = (id) => {
      this.setState(
          {
              data:{
                  title: this.state.FolderName,
                  parent_id: this.props.location
              }
          }
      )

    };

    closeFolderWindow = () => {
        this.props.handleClick(this.state.CreateFolderOrNote)
    };

    receiveNameFolder = (name) => {
        this.setState(
            {
                data:{
                    title: name,
                    parent_id: this.state.window.data.parent_id
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
                                onChange={this.handleChange}/>
                        </div>
                    </div>
                    <button
                        className="button"
                        onClick = {this.createFolderQuery.bind(this)}>
                        <span>Create</span></button>
                </div>

        }

        return isFolderWindow;

    };
}
const mapStateToProps = (state) => {
    console.log(state);
    return {
        title: state.window.data.title,
        CreateFolderOrNote: state.window.CreateFolderOrNote,
        parent_id: state.window.parent_id
    }
};

export default connect(mapStateToProps)(CreateFolderWindow);