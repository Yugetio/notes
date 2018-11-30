import  { ACTION_RECEIVE_NAME_FOLDER, ACTION_OPEN_WINDOW_TO_CREATE, ACTION_CLOSED_WINDOW } from "../constants/index";
import {createRef} from "react";

const initialState = {
    windowForCreating: 0,
    title: createRef(),
    parent_id_folder: '0',
    httpMethod: 'POST',
    url: 'api/auth/folder/{id}',
    caption: createRef(),
    text: createRef(),
    parent_id_note: 0
};

 const createFolderNoteReducer = (state = initialState, action) => {
    switch (action.type) {
        case ACTION_RECEIVE_NAME_FOLDER:
            return {...state, title: action.payload};
        case ACTION_OPEN_WINDOW_TO_CREATE:
            return {...state, windowForCreating: action.payload};
        case ACTION_CLOSED_WINDOW:
            return {...state, windowForCreating: action.payload};
        default:
            return state
    }
};

export default createFolderNoteReducer;