import React, { Component } from 'react';
import '../CreateNoteWindow/cteateNoteWindow.css';
import {connect} from 'react-redux';
import {receiveNameFolder, createTextNote} from '../../actions'
import {bindActionCreators} from 'redux';

class CreateFolderWindow extends Component {

    constructor(props) {
        super(props);
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
                    parent_id: this.state.parent_id
                }
            }
        );
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
       const dispatch = this.props.dispatch;
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
                                onChange={(e) => {
                                    receiveNameFolder(e.target.value);
                                }}
                            />
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
const putStateToProps = (state) => {  //  метод який записує данні з state в props компонента
console.log(state);
    return {
        httpMethod: state.window.httpMethod,
        url: state.window.url,
        title: state.window.data.title
    }
};

const putActionsToProps = (dispatch) => {
    return{
        receiveNameFolder: bindActionCreators(receiveNameFolder, dispatch)
    }
};

export default connect(putStateToProps, putActionsToProps)(CreateFolderWindow);