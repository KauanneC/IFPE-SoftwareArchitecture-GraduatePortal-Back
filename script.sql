-- EventEntity Table
CREATE TABLE EventEntity (
    id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    hour TIME NOT NULL,
    modality VARCHAR(255) NOT NULL,
    place VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);

-- FormEntity Table
CREATE TABLE FormEntity (
    id VARCHAR(255) PRIMARY KEY,
    formType VARCHAR(255) NOT NULL,
    question VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    options TEXT NOT NULL,
    other VARCHAR(255),
    FOREIGN KEY (id) REFERENCES EventEntity(id) ON DELETE CASCADE
);

-- NoticeEntity Table
CREATE TABLE NoticeEntity (
    id VARCHAR(255) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    pdfName VARCHAR(255) NOT NULL,
    link VARCHAR(255) NOT NULL
);

-- ResponseEntity Table
CREATE TABLE ResponseEntity (
    id VARCHAR(255) PRIMARY KEY,
    formId VARCHAR(255) NOT NULL,
    userId VARCHAR(255) NOT NULL,
    value TEXT NOT NULL,
    FOREIGN KEY (formId) REFERENCES FormEntity(id) ON DELETE CASCADE,
    FOREIGN KEY (userId) REFERENCES UserEntity(id) ON DELETE CASCADE
);

-- UserEntity Table
CREATE TABLE UserEntity (
    id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    profile VARCHAR(255) NOT NULL,
    primaryAccess BOOLEAN NOT NULL,
    code VARCHAR(255) NOT NULL
);
