```mermaid
%%{`  More info on mermaid notation see: https://mermaid.js.org/syntax/entityRelationshipDiagram.html.  `}%%
erDiagram
    users ||--o{ orders : Places
    users {
        int    id        PK
        string name
        string email     UK
        string password
    }    
    orders {
        int    id                PK
        int    user_id           FK
        %%{` Fill in the rest of the properties `}%%        
    }
```
