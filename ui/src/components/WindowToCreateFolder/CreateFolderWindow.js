import React, { Component } from 'react';
import '../WindowToCreateNote/cteateNoteWindow.css';
import {connect} from 'react-redux';
import {closeWindow} from '../../actions'
import {bindActionCreators} from 'redux';

class CreateFolderWindow extends Component {

    createFolderQuery() {
        let dataFolder = {
            title: this.props.title.current.value,
            parent_id_folder: this.props.parent_id_folder
        };

        fetch(this.props.url, {
            method: this.props.httpMethod,
            headers: {
                "Content-Type": "application/json; charset=utf-8",
                "Authorization": localStorage.getItem('Authorization')
            },
            body: JSON.stringify(dataFolder, ['title', 'parent_id_folder']),
        })
            .then( response => {
                if (response.status === 200 || response.status === 201) {
                    localStorage.setItem('Authorization', response.headers.get('Authorization'));
                    return response.json();
                }
            })

            .catch( error => console.error(error) );
            console.log(JSON.stringify(dataFolder, ['title', 'parent_id_folder']))
    };

    render() {
        const {closeWindow} = this.props;
        let isFolderWindow;
        if (this.props.windowForCreating === 0 || this.props.windowForCreating === 2) {
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
                                ref={this.props.title}
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
        windowForCreating: state.window.windowForCreating,
        title: state.window.title,
        parent_id_folder: state.window.parent_id_folder,
        input: state.window.input
    }
};

const putActionsToProps = (dispatch) => {
    return{
        closeWindow: bindActionCreators(closeWindow, dispatch)
    }
};

export default connect(putStateToProps, putActionsToProps)(CreateFolderWindow);