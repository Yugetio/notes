import {combineReducers} from 'redux';
import createFolderNote from './windowToCreateFolderOrNote'
import folderContainer from './folderContainer'

const allReducers = combineReducers({
     window: createFolderNote,
     folderContainer: folderContainer
});

export default allReducers;