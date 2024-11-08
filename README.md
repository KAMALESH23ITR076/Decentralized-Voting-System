                # Decentralized-Voting-System-Using-Ethereum-Blockchain

#### The Decentralized Voting System using Ethereum Blockchain is a secure and transparent solution for conducting elections. Leveraging Ethereum's blockchain technology, this system ensures tamper-proof voting records, enabling users to cast their votes remotely while maintaining anonymity and preventing fraud. Explore this innovative project for trustworthy and decentralized voting processes.
#### PS: This project is not maintained anymore.

## Features
-  Implements JWT for secure voter authentication and authorization.
-  Utilizes Ethereum blockchain for tamper-proof and transparent voting records.
-  Removes the need for intermediaries, ensuring a trustless voting process.
-  Admin panel to manage candidates, set voting dates, and monitor results.
-  Intuitive UI for voters to cast votes and view candidate information.

## Requirements
- Node.js (version – 18.14.0)
- Metamask
- Ganache
- FastAPI
- XAMPP

## Usage

#### Note: Update the database credentials in the `./Database_API/.env` file.

1. Open terminal at the project directory

2. Open Ganache and it's <b>development</b> workspace.

3. open terminal in project's root directory and run the command

        truffle console
   then compile the smart contracts with command

        compile
   exit the truffle console

5. Bundle app.js with browserify
    
        browserify ./src/js/app.js -o ./src/dist/app.bundle.js

2. Start the node server server
    
        node index.js

3. Navigate to `Database_API` folder in another terminal
    
        cd Database_API

    then start the database server by following command

        uvicorn main:app --reload --host 127.0.0.1

4. In a new terminal migrate the truffle contract to local blockchain
    
        truffle migrate


## Code Structure

    ├── blockchain-voting-dapp            # Root directory of the project.
        ├── build                         # Directory containing compiled contract artifacts.
        |   └── contracts                 
        |       ├── Migrations.json       
        |       └── Voting.json           
        ├── contracts                     # Directory containing smart contract source code.
        |   ├── 2_deploy_contracts.js     
        |   ├── Migrations.sol            
        |   └── Voting.sol                
        ├── Database_API                  # API code for database communication.
        |   └── main.py                   
        ├── migrations                    # Ethereum contract deployment scripts.
        |   └── 1_initial_migration.js    
        ├── node_modules                  # Node.js modules and dependencies.
        ├── public                        # Public assets like favicon.
        |   └── favicon.ico               
        ├── src                           
        |   ├── assets                    # Project images.
        |   |   └── eth5.jpg              
        |   ├── css                       # CSS stylesheets.
        |   |   ├── admin.css             
        |   |   ├── index.css             
        |   |   └── login.css             
        |   ├── dist                      # Compiled JavaScript bundles.
        |   |   ├── app.bundle.js         
        |   |   └── login.bundle.js       
        |   ├── html                      # HTML templates.
        |   |   ├── admin.html            
        |   |   ├── index.html            
        |   |   └── login.html            
        |   └── js                        # JavaScript logic files.
        |       ├── app.js                
        |       └── login.js              
        ├── index.js                      # Main entry point for Node.js application.
        ├── package.json                  # Node.js package configuration.
        ├── package-lock.json             # Lockfile for package dependencies.
        ├── README.md                     # Project documentation.
        └── truffle-config.js                    # Truffle configuration file.