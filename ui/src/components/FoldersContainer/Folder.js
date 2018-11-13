import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import BackButton from '../BackButton/BackButton';
import CreateBar from '../CreateBar/CreateBar';
import CreateFolderWindow from '../CreateFolderWindow/CreateFolderWindow';
import CreateNoteWindow from '../CreateNoteWindow/CreateNoteWindow';

import './folder.css';

class Folder extends Component {
    constructor(props) {
        super(props);

        this.state = {
            folderId: 0,
            CreateFolderOrNote: 0,
            data:{
                folders: [
                    'my folder',
                    'fruits',
                    'my cars',
                    'photos',
                ],
                notes:[
                    'notes 1',
                    'my notes',
                    'jog',
                    'about dog',
                    'note 213'
                ]
            }

        };
    }

    handleClick = (value) => {
        this.setState({ CreateFolderOrNote: value })
    };



    render() {
        let filteredFolders = this.state.data.folders.filter(
            (folder) => {
                return folder.toLowerCase().indexOf(
                    this.props.searchRequest.toLowerCase()) !== -1;
            });
        let filteredNotes = this.state.data.notes.filter(
            (note) => {
                return note.toLowerCase().indexOf(
                    this.props.searchRequest.toLowerCase()) !== -1;
            });

        return (
            <div className='wrapp'>

                <div className='cont'>
                    <BackButton folderId={this.state.folderId}/>

                    <div className='contForItems'>
                        {
                                filteredFolders.map((folder) => {
                                return (
                                    <Link className='link' to='/folder' key={folder}>
                                        <div className='folder'>{folder} </div>
                                    </Link>
                                )
                            })
                        }
                        {
                            filteredNotes.map( (note) => {
                                return (
                                    <Link className='link' to='/note/{id}' key={note}>
                                        <div className='note'>{note} </div>
                                    </Link>
                                )
                            })
                        }
                        </div>
                    <CreateFolderWindow
                        CreateFolder = {this.state.CreateFolderOrNote}
                        handleClick = {this.handleClick}
                    />
                    <CreateNoteWindow
                        CreateNote = {this.state.CreateFolderOrNote}
                        handleClick = {this.handleClick}
                    />
                    <CreateBar handleClick = {this.handleClick}/>
                </div>

            </div>
        );
    }
}

export default Folder;