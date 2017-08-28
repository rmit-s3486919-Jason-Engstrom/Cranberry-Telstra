// ImageTransferC++.cpp : Defines the entry point for the console application.
//

#include "stdafx.h"
#include "iostream"
#include "fstream"

using namespace std;

//char matrix[3];
int Array[3][3];

int main()
{
	//for (int x = 0; x < 3; x++)
	//{
	//	for (int y = 0; y < 3; y++)
	//	{
	//		matrix[x][y] = 1;
	//	}
	//}

	//for (int x = 0; x < 3; x++)
	//{
	//	for (int y = 0; y <3; y++)
	//	{
	//		cout << matrix[x][y];
	//	}
	//}

	//cout << endl;
	//int Array [3] = {1,0,2};

	int i;
	int j;
	int count = 1;
	for (i = 0; i < 3; i++)
	{
		for (j = 0; j < 3; j++)
		{
			Array[i][j] = count++;
		}
	}

	for (i = 0; i < 3; i++)
	{
		for (j = 0; j < 3; j++)
		{
			cout << Array[i][j];
		}
		cout << endl;
	}
    return 0;
}

