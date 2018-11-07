import React, { Component } from 'react';
import CreateFolder from '../CreateFolder/CreateFolder';
import CreateNote from '../CreateNote/CreateNote';

import './createBar.css';

class CreateBar extends Component {
    constructor(props) {
        super(props);

        this.state = {
        };

    }

    render() {
        return (
            <div className='addFoldNote' >
              <CreateFolder  />
                <CreateNote/>
            </div>
        );
    }
}

export default CreateBar;