## La table compte bancaire

```sql
    CREATE TABLE acount (
    accountId INT PRIMARY KEY AUTO_INCREMENT,
    userId INT,
    acountSold DECIMAL(10, 2) DEFAULT 0.00,
    FOREIGN KEY (userId) REFERENCES user(userId)
);
```
## La table historique d'achat

```sql
    CREATE TABLE purchase (
    purchaseId INT PRIMARY KEY AUTO_INCREMENT,
    accountId INT,
    purAmount DECIMAL(10, 2) NOT NULL,
    purDate DATE,
    purDesc VARCHAR(255),
    FOREIGN KEY (accountId) REFERENCES bank(accountId)
);
```
## Les cartes bancaire

```sql
    CREATE TABLE card (
    cardId INT PRIMARY KEY AUTO_INCREMENT,
    accountId INT,
    cardNumber VARCHAR(16) NOT NULL,
    cardHolderName VARCHAR(255) NOT NULL,
    cardExpiryDate DATE NOT NULL,
    cardCVV VARCHAR(4) NOT NULL,
    cardType VARCHAR(20) NOT NULL,
    FOREIGN KEY (accountId) REFERENCES bank(accountId)
);
```

##

```sql
    
```