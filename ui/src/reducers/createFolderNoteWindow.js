import  { ACTION_CREATE_FOLDER, ACTION_CREATE_NOTE, ACTION_CLOSED_WINDOW } from "../constants/index";

const initialState = {
    CreateFolderOrNote: 0,
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
        case ACTION_CREATE_FOLDER:
            return {...state, caption: action.caption};
        case ACTION_CREATE_NOTE:
            return {...state, caption: action.data.title};
        case ACTION_CLOSED_WINDOW:
            return {...state, caption: action.CreateFolderOrNote};
        default:
            return state
    }
};

export default createFolderNoteReducer;