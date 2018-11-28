import React, { Component } from 'react';
import './cteateNoteWindow.css';
import {closeWindow} from '../../actions'
import {connect} from 'react-redux';
import {bindActionCreators} from "redux";

class CreateNoteWindow extends Component {

    createNoteQuery() {
        fetch(this.state.url, {
            method: this.state.httpMethod,
            headers: {
                "Content-Type": "application/json; charset=utf-8",
                "Authorization": localStorage.getItem('Authorization')
            },
            body: JSON.stringify(this.state.dataFolder),
        })
            .then( response => {
                if (response.status === 200 || response.status === 201) {
                    localStorage.setItem('Authorization', response.headers.get('Authorization'));
                    return response.json();
                }

            })

            .catch( error => console.error(error) );
        console.log(JSON.stringify(this.state.dataFolder))
    };

    render() {
        const {closeWindow} = this.props;
        let isNoteWindow;
        if (this.props.windowForCreating === 0 || this.props.windowForCreating === 1 ) {
            isNoteWindow = null;
        } else {
            isNoteWindow =
                <div className="create">
                    <div className="name">
                        <p>Create Note</p>
                        <p onClick={() => {closeWindow(0);}}>&#10008;</p>
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

const putStateToProps = (state) => {
    return {
        httpMethod: state.window.httpMethod,
        url: state.window.url,
        title: state.window.dataFolder.title,
        windowForCreating: state.window.windowForCreating
    }
};

const putActionsToProps = (dispatch) => {
    return{
        closeWindow: bindActionCreators(closeWindow, dispatch)
    }
};

export default connect(putStateToProps, putActionsToProps)(CreateNoteWindow);
