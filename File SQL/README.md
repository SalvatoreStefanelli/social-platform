# social-platform

### Table name: Users

- id | BIGINT | PK AI UNIQUE NOTNULL
- username | VARCHAR UNIQUE NOTNULL
- email | VARCHAR UNIQUE NOTNULL
- password | VARCHAR NOTNULL 
- birthdate | DATE NOTNULL
- phone | CHAR(10) NULL
- created_at | DATETIME NOTNULL
- update_at | DATETIME NULL

### Table name: Posts

- id | BIGINT | PK AI UNIQUE NOTNULL
- user_id | BIGINT | FK NOTNULL
- title | VARCHAR NULL
- date | DATETIME NULL
- tags | VARCHAR NULL
- created_at | DATETIME NOTNULL
- update_at | DATETIME NULL

### Table name: media_post

- post_id | BIGINT | FK NOTNULL
- media_id | BIGINT | FK NOTNULL
- created_at | DATETIME NOTNULL
- update_at | DATETIME NULL

### Table name: medias

- id | BIGINT | PK AI UNIQUE NOTNULL
- user_id | BIGINT | FK NOTNULL
- type | VARCHAR NULL
- path | TEXT NOTNULL UNIQUE
- created_at | DATETIME NOTNULL
- update_at | DATETIME NULL

### Table name: likes

- post_id | BIGINT | FK NOTNULL
- user_id | BIGINT | FK NOTNULL
- date | DATETIME NULL  
- created_at | DATETIME NOTNULL
- update_at | DATETIME NULL


