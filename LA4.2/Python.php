# USER REGISTRATION AND LOG IN PROGRAM

# FUNCTION TO REGISTER A NEW User

def register_user():
    print("=== User Registration ===")
    
# COLLECT USER INFORMATION

    first_name = input("Enter First Name: ")
    last_name = input("Enter Last Name: ")
    course = input("Enter Course: ")
    year_level = input("Enter Year Level: ")
    section = input("Enter Section: ")
    username = input("Enter Username: ")
    password = input("Enter Password: ")
    
 # COLLECT PIN CODE WITH VALIDATION 

    pin_code = input("Enter Pin Code (max 8 characters): ")
    while len(pin_code) > 8:
        print("Pin Code must be a maximum of 8 characters. Please try again.")
        pin_code = input("Enter Pin Code (max 8 characters): ")
    
 # STORE USER INFORMATION IN A DICTIONARY 

    user_info = {
        "first_name": first_name,
        "last_name": last_name,
        "course": course,
        "year_level": year_level,
        "section": section,
        "username": username,
        "password": password,
        "pin_code": pin_code
    }
    
    return user_info

# FUNCTION TO AUTHENTICATE USER

  def authenticate_user(users):
    while True:
        print("\n=== User Login ===")
        username = input("Enter Username: ")
        password = input("Enter Password: ")
        
# CHECK IF USERNAME AND PASSWORD ARE CORRECT 

        user = next((user for user in users if user['username'] == username and user['password'] == password), None)
        
        if user:
            # ASK FOR PIN CODE 

            pin_code = input("Enter Pin Code: ")
            if pin_code == user['pin_code']:
                # Successful authentication
                print("\n=== User Information ===")
                print(f"First Name: {user['first_name']}")
                print(f"Last Name: {user['last_name']}")
                print(f"Course: {user['course']}")
                print(f"Year Level: {user['year_level']}")
                print(f"Section: {user['section']}")
                break
            else:
                print("Incorrect Pin Code. Please try again.")
        else:
            print("Incorrect Username or Password. Please try again.")

# MAIN PROGRAM EXECUTION 

    users = []  # List to store registered users
    
    while True:
        # REGISTER A NEW USER 

        user_info = register_user()
        users.append(user_info)
        print("Congratulations! You have successfully registered.")
        
        # ASK IF THE USER WANTS TO LOG IN 
        
        login_choice = input("Do you want to log in? (yes/no): ").strip().lower()
        
        if login_choice == 'yes':
            authenticate_user(users)
        elif login_choice == 'no':
            print("Exiting the program. Goodbye!")
            break
        else:
            print("Invalid choice. Please enter 'yes' or 'no'.")

# RUN THE PROGRAM

    if __name__ == "__main__":
       main()
