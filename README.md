# fantasyBlog

_Votre blog disposera d'un espace administrateur permettant_ 

    - d'écrire / modifier / supprimer les articles, 
    - d'écrire / modifier / supprimer les commentaires.
    - d'attribuer les rôles
    - supprimer / mettre à jour les utilisateurs
    
### Data base :

| user      | article    | comment   | role       | role_user |
|-----------|------------|-----------|------------|-----------|
| - id      | - id       | - id      | - id       | - id      |
| - pseudo  | - title    | - content | - role_name| - role_fk |  
| - mail    | - content  | - article |            | - user_fk |
| - password| - image    | - author  |            |           |
|           | - author   |           |            |           |

### manager :

    - article -> crud
    - comment -> crud
    - role -> crud
    - user -> crud

