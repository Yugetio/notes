import React, { Component } from 'react';
import './createFolder.css';


class CreateFolder extends Component {

    constructor(props) {
        super(props);
        this.state = {
            CreateFolder: 1,
        };
    };



click = () => {
    this.props.handleClick(this.state.CreateFolder)
};


    render() {
        return (
            <div className="field" onClick={this.click}>
                <p className='createFolder'> </p>
            </div>
        );
    };
}

export default CreateFolder;