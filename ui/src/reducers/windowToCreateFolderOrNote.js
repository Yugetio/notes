import  { ACTION_RECEIVE_NAME_FOLDER, ACTION_OPEN_WINDOW_TO_CREATE, ACTION_CLOSED_WINDOW } from "../constants/index";

const initialState = {
    windowToCreate: 0,
    data: {
        title: '',
        parent_id: 0,
        caption: '',
        text: ''
    },
    httpMethod: 'POST',
    url: 'api/auth/folder/{id}'
};

 const createFolderNoteReducer = (state = initialState, action) => {
    switch (action.type) {
        case ACTION_RECEIVE_NAME_FOLDER:
            return {...state, title: action.payload};
        case ACTION_OPEN_WINDOW_TO_CREATE:
            return {...state, windowToCreate: action.payload};
        case ACTION_CLOSED_WINDOW:
            return {...state, windowToCreate: action.payload};
        default:
            return state
    }
};

export default createFolderNoteReducer;