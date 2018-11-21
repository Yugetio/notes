import {combineReducers} from 'redux';
import createFolderNote from './createFolderNoteWindow'

const allReducers = combineReducers({
   window: createFolderNote,
});

export default allReducers;