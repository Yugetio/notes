import React, { Component } from 'react';
import '../WindowToCreateNote/cteateNoteWindow.css';
import {connect} from 'react-redux';
import {receiveNameFolder, closeWindow} from '../../actions'
import {bindActionCreators} from 'redux';

class CreateFolderWindow extends Component {

    createFolderQuery() {
        fetch(this.url, {
            method: this.httpMethod,
            headers: {
                "Content-Type": "application/json; charset=utf-8",
                "Authorization": localStorage.getItem('Authorization')
            },
            body: JSON.stringify(this.data),
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
        console.log(this.props);
        const {receiveNameFolder, closeWindow} = this.props;
        let isFolderWindow;
        if (this.props.windowToCreate === 0 || this.props.windowToCreate === 2) {
            isFolderWindow = null;
        } else {
            isFolderWindow =
                <div className="create">
                    <div className="name">
                        <p>Create Folder</p>
                        <p onClick={() => {
                            closeWindow(0);
                        }}

                        >&#10008;</p>
                    </div>
                    <div className="inputFieldsFolder">
                        <div className="inputTitleFolder" >
                            <input
                                className="inputStyle"
                                type="text"
                                placeholder="Enter folder name"
                                onClick={(e) => {
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
        title: state.window.data.title,
        windowToCreate: state.window.windowToCreate
    }
};

const putActionsToProps = (dispatch) => {
    return{
        receiveNameFolder: bindActionCreators(receiveNameFolder, dispatch),
        closeWindow: bindActionCreators(closeWindow, dispatch)
    }
};

export default connect(putStateToProps, putActionsToProps)(CreateFolderWindow);