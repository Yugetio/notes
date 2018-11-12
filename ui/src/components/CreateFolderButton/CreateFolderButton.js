import React, { Component } from 'react';
import './createFolder.css';


class CreateFolderButton extends Component {

    constructor(props) {
        super(props);
        this.state = {
            CreateFolderOrNote: 1,
        };
    };


clickCreateFolder = () => {
    this.props.handleClick(this.state.CreateFolderOrNote)
};


    render() {
        return (
            <div
                className="field"
                onClick={this.clickCreateFolder}
            >
                <p className='createFolder'> </p>
            </div>
        );
    };
}

export default CreateFolderButton;