# fantasyBlog

_Votre blog disposera d'un espace administrateur permettant_ 

    - d'écrire / modifier / supprimer les articles, 
    - d'écrire / modifier / supprimer les commentaires.
    - d'attribuer les rôles
    - supprimer / mettre à jour les utilisateurs
    
## Data base :

- user
    - id
    - pseudo
    - mail
    - password
        
- article
    - id
    - title
    - content
    - image
    - author
    
- comment
    - id
    - content
    - article
    - author
    
- role
    - id
    - role_name
    
- role_user
    - id
    - role_fk
    - user_fk

##controler :

    - article -> crud
    - user -> crud
    - comment -> crud
    - role -> crud
    

    
    