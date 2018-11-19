import {combineReducers} from 'redux';
import windowReducer from './createWindow'

const allReducers = combineReducers({
   // window: windowReducer,
});

export default allReducers;