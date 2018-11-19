import  { ACTION_CREATE_NAME_FOLDER, ACTION_CREATE_NAME_NOTE, ACTION_CREATE_TEXT_NOTE } from "../constants/index";

export const createNameFolder = (nameFolder) => {
    return {
        type: ACTION_CREATE_NAME_FOLDER,
        caption: nameFolder
    }
};

export const createNameNote = (nameNote) => {
    return {
        type: ACTION_CREATE_NAME_NOTE,
        caption: nameNote
    }
};

export const createTextNote = (textNote) => {
    return {
        type: ACTION_CREATE_TEXT_NOTE,
        caption: textNote
    }
};

