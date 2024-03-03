## La table utilisateur

```sql
CREATE TABLE user (
   userId INT PRIMARY KEY AUTO_INCREMENT,
   userPseudo VARCHAR(255) NOT NULL,
   userEmail VARCHAR(255) NOT NULL,
   userPassword VARCHAR(255) NOT NULL,
   userName VARCHAR(255) NOT NULL,
   userFirstName VARCHAR(255) NOT NULL,
   userGenre char,
   userBirthDate DATE,
   userPhoneNumber VARCHAR(20),
   userJobs VARCHAR(255),
   userIncome DECIMAL(10, 2),
   userRole  VARCHAR(255) NOT NULL,
   userEthnic VARCHAR(255),
   userProfileImage VARCHAR(255),
   userIsFaker BOOLEAN NOT NULL
);
```
```sql
    INSERT INTO user (userPseudo, userEmail, userPassword, userName, userFirstName, userGenre, userBirthDate, userPhoneNumber, userJobs, userIncome, userRole, userEthnic, userProfileImage, userIsFaker) VALUES ('R3tr0', 'a@gmail.com', 'a', 'Corda', 'Andras', 'M', '2005-01-01', '000000000', 'Dev', 0.00, 'admin', 'No info', '1.jpg', false);
```

## La table casier judiciaire

```sql
CREATE TABLE criminal_record (
    recordId INT PRIMARY KEY AUTO_INCREMENT,
    userId INT,
    recordReason VARCHAR(255) NOT NULL,
    recordDate DATE NOT NULL,
    recordDangerousness VARCHAR(255),
    FOREIGN KEY (userId) REFERENCES user (userId)
);
```

## La table des choses récentes

```sql
CREATE TABLE recent (
    recentId INT PRIMARY KEY AUTO_INCREMENT,
    userId INT,
    recentDate DATETIME NOT NULL,
    recentContent TEXT NOT NULL,
    FOREIGN KEY (userId) REFERENCES user (userId)
);
```