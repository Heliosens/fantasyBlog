# fantasyBlog

_Votre blog disposera d'un espace administrateur permettant_ 

    - d'écrire / modifier / supprimer les articles, 
    - d'écrire / modifier / supprimer les commentaires.
    - d'attribuer les rôles
    - supprimer / mettre à jour les utilisateurs
    
## Data base :

- user
    - id
    - name
    - mail
    - password
    - role
        
- article
    - id
    - title
    - content
    - author
    
- comment
    - id
    - content
    - article
    - author
    
- role
    - id
    - name

## function

    article -> crud
    user -> crud
    comment -> crud
    role -> crud
    
    register : to valid by admin
    connection / disconnection
    display article : to valid by admin