import os

# Specify the directory path
directory_path = "characters/"

# Get the list of files in the directory
try:
    file_list = os.listdir(directory_path)
    # Filter only files (excluding directories)
    file_list = [file for file in file_list if os.path.isfile(os.path.join(directory_path, file))]

    # Format and print as a JavaScript array
    js_array = ',\n'.join([f'"{file}"' for file in file_list])
    print(f"const characters = [\n{js_array}\n];")
    
except FileNotFoundError:
    print("Directory not found. Please check the path.")

[
"123.png",
"123123123.png",
"12321.png",
"123213.png",
"12332.png",
"1234.png",
"124.png",
"132114.png",
"13432.png",
"213.png",
"21312.png",
"2213.png",
"22222222.png",
"231.png",
"231223.png",
"23123.png",
"231232.png",
"231241.png",
"2321.png",
"23212.png",
"232123.png",
"2321322.png",
"3.png",
"3121.png",
"312123.png",
"3123.png",
"3123123.png",
"3123132.png",
"3212.png",
"321232.png",
"3231.png",
"323123.png",
"33.png"
];