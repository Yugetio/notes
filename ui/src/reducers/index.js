import {combineReducers} from 'redux';
import createWindow from './createWindow'

const allReducers = combineReducers({
   window: createWindow
});

export default allReducers;